input = 'Hello World'

puts 'Using iterator each_char : ' 
input.each_char { |c| 
    print c
}
 
puts
puts'Using iterator each : '
input.split('').each { |c| 
    print c
}

puts
puts'Using iterator times : '
1.times do |x|
puts "Hello World"
end
