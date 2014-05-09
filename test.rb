
file = "./uploadfile/image/20140427131310.jpg"
if File.exist?(file) == false
	puts "create " + file
	if Dir.exist?(File.dirname(file)) == false
		segArr = File.dirname(file).split('/')
		dir = ""
		segArr.each do |segment|
			if dir == ""
				dir = segment
			else
				dir = dir + "/" + segment
			end
			puts dir
			if Dir.exist?(dir) == false
				Dir.mkdir(dir)
				puts "mkdir "+dir
			end
		end
	end
	if File.exist?(file) == false
		File.new(file, 'w')
	end
end
