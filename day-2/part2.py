input = open("input.txt", "r")
lines = input.readlines()
input.close()

gamePowerSum = 0

for i in range(len(lines)):

    cubeCounts = {
        'red': 0,
        'green': 0,
        'blue': 0,
    }

    line = lines[i].strip()
    gameID = int(line[line.find(' '):line.find(':')].strip())
    gameSets = line[line.find(':') + 1:].strip().split(';')
    for j in range(len(gameSets)):
        gameSets[j] = gameSets[j].strip().split(',')
        for k in range(len(gameSets[j])):
            amount, colour = gameSets[j][k].strip().split(' ')
            if cubeCounts[colour] < int(amount):
                cubeCounts[colour] = int(amount)
    
    gamePowerSum += cubeCounts['red'] * cubeCounts['green'] * cubeCounts['blue']

print(gamePowerSum)