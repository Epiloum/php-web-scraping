# pip install requests
# pip install beautifulsoup4

import requests
from bs4 import BeautifulSoup

def scrapWebpage(url, selector):
    res = []
    html = BeautifulSoup(requests.get(url).text, 'html.parser');
    for v in html.select(selector):
        res.append(v.text)
    return res


url = 'https://dev.epiloum.net'
selector = '#primary-menu li a';

print(scrapWebpage(url, selector))
