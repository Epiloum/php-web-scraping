library(rvest);

scrapWebpage <- function(url, selector) {
  html <- read_html(url);
  elem <- html_elements(html, selector);
  return (html_text(elem));
}

url <- 'https://dev.epiloum.net';
selector <- 'h1.site-title a';
scrapWebpage(url, selector);