input = open("input.txt", "r")
lines = input.readlines()
input.close()

total = 0
cardCounts = {}

for line in lines:
    line = line.lstrip('Card ')
    gameNumber = int(line[:line.find(':')])
    totalCards = (gameNumber in cardCounts and cardCounts[gameNumber] or 0) + 1
    cardCounts[gameNumber] = totalCards
    line = line[line.find(':') + 1:line.__len__()]

    matchingNumbers = 0
    
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
            matchingNumbers += 1

    if matchingNumbers == 0:
        continue

    for cardNumber in range(gameNumber + 1, gameNumber + matchingNumbers + 1):
        if cardNumber in cardCounts:
            cardCounts[cardNumber] += totalCards
        else:
            cardCounts[cardNumber] = totalCards

for key, value in cardCounts.items():
    total += value

print(total)