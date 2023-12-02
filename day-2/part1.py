input = open("input.txt", "r")
lines = input.readlines()
input.close()

maxColours = {
    'red': 12,
    'green': 13,
    'blue': 14,
}

validGameIDsSum = 0

for i in range(len(lines)):
    broken = False
    line = lines[i].strip()
    gameID = int(line[line.find(' '):line.find(':')].strip())
    gameSets = line[line.find(':') + 1:].strip().split(';')
    for j in range(len(gameSets)):
        gameSets[j] = gameSets[j].strip().split(',')
        for k in range(len(gameSets[j])):
            amount, colour = gameSets[j][k].strip().split(' ')
            if int(amount) > maxColours[colour]:
                broken = True
                break
        if broken:
            break
    if not broken:
        validGameIDsSum += gameID

print(validGameIDsSum)