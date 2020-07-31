import os
import datetime

# Date validation
while True:
    try:
        date = input("Please input date <YYYYMMDD>: ")
        dt = datetime.datetime.strptime(date, '%Y%m%d')
    except ValueError:
        print("Incorrect data format, should be YYYYMMDD")
        continue
    else:
        break

# Create directory tre
dataDir = "C:\data"
for task in range(11):
    task = dt
    try:
        tree = f"{dataDir}\{dt.year}\{dt.month:02d}\{dt.day:02d}"
        os.makedirs(tree)

        txt = open(f"{tree}\info.txt", "w")
        txt.write(f"{dt.year}{dt.month:02d}{dt.day:02d}")
        txt.close

        dt = dt + datetime.timedelta(1)
    except FileExistsError:
        pass
