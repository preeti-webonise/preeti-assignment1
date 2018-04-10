class KnightTour
  def initialize(n)
    @n = n
    @move = 0
    @board = Array.new(n) { Array.new(n, 0) }
  end

  def solve(x, y)
    if findPath(x, y, 0) then printBoard else puts "NO SOLUTION FOUND" end
  end

  def findPath(row, col, index)
    return false if @board[row][col] != 0
    @move += 1
    @board[row][col] = @move
    return true if index.equal?(@n*@n-1)
    relativeMoves = [[2,1],[1,2],[-1,2],[-2,1],[-2,-1],[-1,-2],[1,-2],[2,-1]]
    relativeMoves.each do |relRow, relCol|
      if validMove(row+relRow, col+relCol)
        return true if findPath(row+relRow, col+relCol, index+1)
      end
   end
    @board[row][col] = 0
    @move -= 1
    false
  end

  def validMove(row, col)
    row.between?(0,@n-1) and col.between?(0,@n-1)
  end

  def printBoard
    puts "Output Board:"
    @board.each do |row|
      row.each do |value|
        print value < 10 ? " #{value} " : "#{value} "
      end
      puts
    end
  end

end

puts 'Board Size is 5*5'
puts 'Enter the row for the initial position of the knight between 0-4: '
x = gets.chomp.to_i
puts 'Enter the column for the initial position of the knight between 0-4: '
y = gets.chomp.to_i 
boardDimension = 5
board = KnightTour.new(boardDimension)
board.solve(x, y)