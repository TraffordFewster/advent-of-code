input = open("input.txt", "r")
lines = input.readlines()
input.close()

total = 0

for i in range(len(lines)):
    firstNumber = None
    lastNumber = None

    line = lines[i].strip()

    # Get the first number
    for j in range(len(line)):
        if line[j].isdigit():
            firstNumber = int(line[j])
            break

    # Get the last number
    for j in range(len(line) - 1, -1, -1):
        if line[j].isdigit():
            lastNumber = int(line[j])
            break
    
    total += int(f"{firstNumber}{lastNumber}")

print(total)