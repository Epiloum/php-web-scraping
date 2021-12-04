require 'net/http'
require 'nokogiri'

def scrapWebpage(url, selector)
  res = []

  html = Net::HTTP.get(URI(url))
  Nokogiri::HTML(html).css(selector).each do |v|
    res.push(v.text)
  end

  return res
end

url = 'https://dev.epiloum.net'
selector = '.blog-feed-category'
puts scrapWebpage(url, selector)