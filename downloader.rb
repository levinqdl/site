#download files

require 'nokogiri'
require 'open-uri'

$baseURL ="http://www.sh1c.cn/"

$doc = Nokogiri::HTML(open("show.html"))

def createFileIfNotExist file
	image_extensions = [ ".jpg", ".png", ".gif", "swf"]
	if Dir.exist?(File.dirname(file)) == false
		segArr = File.dirname(file).split('/')
		dir = ""
		segArr.each do |segment|
			if dir == ""
				dir = segment
			else
				dir = dir + "/" + segment
			end
			if Dir.exist?(dir) == false
				Dir.mkdir(dir)
			end
		end
	end
	if image_extensions.include?(File.extname(file))
		mode = 'wb'
	else
		mode = 'w'
	end
	return File.new(file, mode)
end

def foo ( tag, attr )
	count = 0
	$doc.css(tag+"["+attr+"]").each do |t|
		path = t.attribute(attr).text
		if path[0,4] != "http"
			data = open($baseURL+path){|f| f.read}
			if path[0] == '/'
				path = '.' + path
			end
			
			file = createFileIfNotExist path
			
			t[attr] = file.path
			file << data
			file.close
			count = count + 1
		end
	end
	puts count.to_s + " files downloaded"
end

foo "img", "src"

f = File.open("show.html", "w")
f.write($doc);
f.close;