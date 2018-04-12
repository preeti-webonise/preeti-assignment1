class PlaneArrangement
	def getData
		puts "Enter the number of flights :"
		@n = gets.chomp.to_i 
		if @n.between?(1,10) 
			@arrivalTime = Array.new()
			@departureTime = Array.new()
			for i in (1..@n) do
	 			puts "Enter the arival time for #{i} plane : "
	 			arriveTime = gets.chomp.to_f
	 			puts "Enter the departure time for #{i} plane : "
	 			departTime = gets.chomp.to_f
	 			if(arriveTime < departTime)
	 				@arrivalTime.push(arriveTime)
	 				@departureTime.push(departTime)
	 			else
	 				puts "Arrival time of the flight should be less than its departureTime.Try again...."
	 				redo
	 			end
			end
			flightTimings = (@arrivalTime.zip(@departureTime)).sort_by(&:first)
			@arrivalTime = flightTimings.map(&:first)
			@departureTime = flightTimings.map(&:last) 
		else
			puts "Enter a number between 1 and 10"
		end
		calculatePlatforms
	end

	def calculatePlatforms
		i = j = platformNeeded = maxPlatforms = 0
		while (i < @n && j < @n)
			if(@arrivalTime[i] < @departureTime[j])
				platformNeeded += 1	
				i += 1
				if (platformNeeded > maxPlatforms)
					maxPlatforms = platformNeeded
				end
			else
				platformNeeded -= 1
				j += 1
			end
		end 
		puts "No.of platforms needed : #{maxPlatforms}"
	end
end

platforms = PlaneArrangement.new()
platforms.getData
