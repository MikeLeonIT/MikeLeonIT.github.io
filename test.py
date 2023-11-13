with open('b5f05817-d014-41e7-9af3-d342d5640791.txt', 'r', encoding='utf-8') as file:
    lines = [line.rstrip() for line in file]
    result = []
    for x in lines:
        x = x.split('\x1d93')[0]
        result.append(x)
    print(result)

with open('error.log', 'r', encoding='utf-8') as file:
    lines2 = [line.rstrip() for line in file]
    result2 = []
    #print(lines2)
    for x in lines2:
        if "SC\\x111\\x11" in x:
            x = x.split('\\')[2][3:]
            if x != 'NoRead"' and x not in result2:
                result2.append(x)
    print(result2)
count = 0
count2 = 0
for x in result:
    if x in result2:
        count+=1
    else:
        print(x)
        count2+=1
print(len(result))
print(len(result2))
print(count)
print(count2)