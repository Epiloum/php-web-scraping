const axios = require('axios');
const cheerio = require('cheerio');

async function webScraping(url, selector) {
  let res = [];
  let html = await axios.get(url);
  let $ = cheerio.load(html.data);
  
  for(let v of $(selector)) {   
    res.push($(v).text());
  }
  
  return res;
}

webScraping('https://dev.epiloum.net', 'h2.entry-title').then((res) => {
  console.log(res)
});