input = open("input.txt", "r")
lines = input.readlines()
input.close()

foundNumber = False
addedThisNumber = False
total = 0

def getNumber(line, index):
    length = 0
    startIndex = index
    
    for i in range(index, -1, -1):
        char = line[i]
        if char.isdigit():
            startIndex = i
        else:
            break

    for i in range(startIndex, len(line)):
        char = line[i]
        if char.isdigit():
            length += 1
        else:
            break
    return line[startIndex:startIndex + length]

def getSurrounding(lineIndex, index):
    surrounding = []

    for i in range(lineIndex - 1, lineIndex + 2):
        if not i in range(0, len(lines)):
            continue

        line = lines[i]
        for j in range(index - 1, index + 2):
            if not j in range(0, len(line)):
                continue
            char = line[j]
            if (char.isdigit()):
                if (surrounding.__contains__([i, j - 1])):
                    continue
                
                lastCharacterIsDigit = line[j - 1].isdigit()
                if lastCharacterIsDigit and (surrounding.__contains__([i, j - 2])):
                    continue

                surrounding.append([i, j])
    return surrounding

# print(checkSurrounding(1, 1))

for i in range(len(lines)):
    line = lines[i]
    for j in range(len(line)):
        char = line[j]

        if char == '*':
            surroundings = getSurrounding(i, j)

            if (surroundings.__len__() >= 2):
                thisGear = 1
                for surrounding in surroundings:
                    gearValue = int(getNumber(lines[surrounding[0]], surrounding[1]))
                    # print(gearValue, end=" ")
                    thisGear *= gearValue
                # print()
                total += thisGear


print(total)

