input = open("input.txt", "r")
lines = input.readlines()
input.close()

foundNumber = False
addedThisNumber = False
total = 0

def getNumberLength(line, index):
    length = 0

    for i in range(index, len(line)):
        char = line[i]
        if char.isdigit():
            length += 1
        else:
            break
    return length

def checkSurrounding(lineIndex, index):
    for i in range(lineIndex - 1, lineIndex + 2):
        if not i in range(0, len(lines)):
            continue

        line = lines[i]
        for j in range(index - 1, index + 2):
            if not j in range(0, len(line)):
                continue
            char = line[j]
            if (not char.isdigit()) and (char != ".") and (char != ' ') and (char != '\n'):
                return True
    return False

# print(checkSurrounding(1, 1))

for i in range(len(lines)):
    line = lines[i]
    for j in range(len(line)):
        char = line[j]

        if char.isdigit():
            if not foundNumber:
                foundNumber = line[j:j + getNumberLength(line, j)]
            elif addedThisNumber:
                continue
        else:
            foundNumber = False
            addedThisNumber = False


        if foundNumber and checkSurrounding(i, j):
            total += int(foundNumber)
            addedThisNumber = True

print(total)

