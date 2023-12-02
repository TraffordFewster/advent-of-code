input = open("input.txt", "r")
lines = input.readlines()
input.close()

total = 0

dict = {
    "one": 1,
    "two": 2,
    "three": 3,
    "four": 4,
    "five": 5,
    "six": 6,
    "seven": 7,
    "eight": 8,
    "nine": 9,
}

for i in range(len(lines)):
    firstNumber = None
    lastNumber = None

    line = lines[i].strip()

    # Get the first number
    for j in range(len(line)):
        if line[j].isdigit():
            firstNumber = int(line[j])
        for key in dict.keys():
            if line[j:j + len(key)] == key:
                firstNumber = dict[key]
        if firstNumber != None:
            break

    # Get the last number
    for j in range(len(line) - 1, -1, -1):
        if line[j].isdigit():
            lastNumber = int(line[j])
        for key in dict.keys():
            if line[j:j + len(key)] == key:
                lastNumber = dict[key]
        if lastNumber != None:
            break
    
    total += int(f"{firstNumber}{lastNumber}")

print(total)