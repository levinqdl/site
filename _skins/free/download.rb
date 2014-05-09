#download the images in css files
require "open-uri"

$baseURL ="http://www.sh1c.cn/_skins/free/"
count = 0
File.open "style.css", :encoding => 'utf-8' do |file|
	# puts file.find_all { |line| line =~ /\bbackground:url(.*)/ }
	file.each do |line|
		if line.match(/\bbackground:url(.*) /) != nil
			path = line.match(/images\/.*\.jpg/).to_s
			f = File.new(path, 'wb')
			begin
				data = open($baseURL+path){|f| f.read}
				f << data
				f.close
				count=count+1
			rescue OpenURI::HTTPError => e
				puts path + e.message
			end
		end
	end
end

puts count.to_s + " files downloaded"