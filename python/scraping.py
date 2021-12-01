# pip install requests
# pip install beautifulsoup4

import requests
from bs4 import BeautifulSoup

def scrapWebpage(url, selector):
    html = BeautifulSoup(requests.get(url).text, 'html.parser');
    return html.select(selector)[0].text

print(scrapWebpage(url, selector))
