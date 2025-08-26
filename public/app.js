import { privateNoteUrl, fileDropUrl, homeDomain, github } from "./links.js";

const yearEl = document.querySelector("#year"),
	homeDomainEl = document.querySelector("#home-domain"),
	noteLink = document.querySelector('[data-link="note"]'),
	dropLink = document.querySelector('[data-link="drop"]'),
	githubLink = document.querySelector('[data-link="github"]');

// set the current year
if (yearEl) { yearEl.textContent = String(new Date().getFullYear()); }

// set home domain text and href
if (homeDomainEl) {
	homeDomainEl.textContent = homeDomain.replace(/^https?:\/\//, "");
	homeDomainEl.setAttribute("href", homeDomain);
	homeDomainEl.setAttribute("target", "_blank");
	homeDomainEl.setAttribute("rel", "noopener");
}

// wire up links from config
if (noteLink) { noteLink.setAttribute("href", privateNoteUrl); }
if (dropLink) { dropLink.setAttribute("href", fileDropUrl); }
if (githubLink) {
	githubLink.setAttribute("href", github);
	githubLink.textContent = github;
}

