#remove empty lines in the files

file = "classic.php"
open("tmp.txt", "w") do |out|
	open(file, :encoding => 'utf-8') do |line|
		out << line.read.squeeze("\n")
	end
end

File.delete(file)
File.rename("tmp.txt", file)