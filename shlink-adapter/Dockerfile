FROM oven/bun

WORKDIR /app

RUN ls /app > /app/temp.txt
COPY server.js .

EXPOSE 3000

CMD ["bun", "run", "server.js"]
