import { privateNoteUrl, fileDropUrl, homeDomain } from "./links.js";

const yearEl = document.querySelector("#year"),
  homeDomainEl = document.querySelector("#home-domain"),
  noteLink = document.querySelector('[data-link="note"]'),
  dropLink = document.querySelector('[data-link="drop"]');

// set the current year
if (yearEl) { yearEl.textContent = String(new Date().getFullYear()); }

// set home domain text
if (homeDomainEl) { homeDomainEl.textContent = homeDomain; }

// wire up links from config
if (noteLink) { noteLink.setAttribute("href", privateNoteUrl); }
if (dropLink) { dropLink.setAttribute("href", fileDropUrl); }

