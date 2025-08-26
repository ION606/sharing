import http from "http";

const base = process.env.SHLINK_BASE ?? "";
const key  = process.env.SHLINK_API_KEY ?? "";

const server = http.createServer(async (req, res) => {
  try {
    const u = new URL(req.url ?? "/", "http://local/");
    if (req.method === "OPTIONS" && u.pathname === "/shorten") {
      res.writeHead(204); res.end(); return;
    }
    
    if (u.pathname === "/" || u.pathname === "") {
	res.writeHead(200); res.end("Ok"); return;
    }

    if (req.method !== "GET" || u.pathname !== "/shorten") {
      res.writeHead(404); res.end("not found"); return;
    }

    const longUrl =
      u.searchParams.get("link") ??
      u.searchParams.get("url") ??
      u.searchParams.get("longUrl");

    if (!longUrl) { res.writeHead(400); res.end("missing url"); return; }

    // shlink v3 rest api: create short url
    const r = await fetch(`${base}/rest/v3/short-urls`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Api-Key": key
      },
      body: JSON.stringify({ longUrl })
    });

    if (!r.ok) {
      const txt = await r.text();
      res.writeHead(502); res.end(`shlink error: ${txt}`); return;
    }
    const data = await r.json();
    res.writeHead(200, { "Content-Type": "text/plain; charset=utf-8" });
    res.end((data.shortUrl ?? "") + "\n");
  } catch {
    res.writeHead(500); res.end("internal error");
  }
});

server.listen(3000);

