input = open("input.txt", "r")
lines = input.readlines()
input.close()

total = 0

for line in lines:
    line = line.lstrip('Card ')
    line = line[line.find(':') + 1:line.__len__()]

    cardScore = None
    
    parts = line.split(' | ')
    winningNumbers = parts[0].strip().split(' ')
    ourNumbers = parts[1].strip().split(' ')

    formattedWinningNumbers = []
    for key, number in enumerate(winningNumbers):
        if number.strip() == '':
            continue
        
        formattedWinningNumbers.append(int(number.strip()))
    
    for key, number in enumerate(ourNumbers):
        if number.strip() == '':
            continue
        
        if int(number.strip()) in formattedWinningNumbers:
            if cardScore == None:
                cardScore = 1
            else:
                cardScore *= 2

    if cardScore != None:
        total += cardScore

print(total)