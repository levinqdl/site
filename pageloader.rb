require 'open-uri'

url = 'http://www.sh1c.cn/channel.asp?id=4'

file = File.new('show.html', 'w')
data = open(url){|f| f.read}
file << data
file.close
