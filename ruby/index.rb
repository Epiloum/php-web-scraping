require 'net/http'
require 'nokogiri'

def scrapWebpage(url, selector)
  html = Net::HTTP.get(URI(url))
  doc = Nokogiri::HTML(html)
  return doc.css(selector).text
end

url = 'https://dev.epiloum.net/1926'
selector = 'h1.site-title a'
puts scrapWebpage(url, selector)
