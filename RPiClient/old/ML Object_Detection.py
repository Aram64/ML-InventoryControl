# import the necessary packages
from picamera.array import PiRGBArray
from picamera import PiCamera
import time
import cv2


#initialize path and color
pinCas = cv2.CascadeClassifier("clothpincascade.xml") #face_cascade
RPiCas = cv2.CascadeClassifier("RPiCascadeNew.xml")
ConCas = cv2.CascadeClassifier("xboxControlCascadeNew.xml")
#cansCas = cv2.CascadeClassifier("RPiCascadeNew.xml") #cans_cascade
minArea = 100
#color = (255,0,255)
count = 0
itemupdate = ""

# initialize the camera and grab a reference to the raw camera capture
camera = PiCamera()
camera.resolution = (352,240)
camera.framerate = 24
camera.brightness = 50
rawCapture = PiRGBArray(camera, size=(352,240))
name1 = "Pins "
name2 = "RaspberryPi "
name3 = "Controller "
# allow the camera to warmup
time.sleep(0.1)
cv2.startWindowThread()

# capture frames from the camera
for frame in camera.capture_continuous(rawCapture, format="bgr", use_video_port=True):
    # grab the raw NumPy array representing the image, then initialize the timestamp
    # and occupied/unoccupied text
    image = frame.array
    imgGray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    square = pinCas.detectMultiScale(imgGray, 1.13, 4)
    for (x, y, w, h) in square:
        area = w * h
        if area > minArea:
            cv2.rectangle(image, (x, y), (x + w, y + h), (0, 0, 255), 2)
            count += 1
            nameA = "Pins " + str(count)
            cv2.putText(image, nameA, (x, y - 5),
                        cv2.FONT_HERSHEY_COMPLEX_SMALL, 1, (0, 0, 255), 2)
            # imgRoi = img[y:y + h, x:x + w]
            # cv2.imshow("ROI", imgRoi)
    count = 0
    square2 = RPiCas.detectMultiScale(imgGray, 1.10, 1)
    count2 = 0
    minArea = 100
    for (x, y, w, h) in square2:
        area = w * h
        count2 = 0
        if area > minArea:
            cv2.rectangle(image, (x, y), (x + w, y + h), (255, 255, 255), 2)
            count2 += 1
            nameB = "RaspberryPi " + str(count2)
            cv2.putText(image, nameB, (x, y - 5),
            cv2.FONT_HERSHEY_COMPLEX_SMALL, 1, (255, 255, 255), 2)

    
    square3 = ConCas.detectMultiScale(imgGray, 1.1, 1)
    count3 = 0
    minArea = 100
    for (x, y, w, h) in square3:
        area = w * h
        count3 = 0
        if area > minArea:
            cv2.rectangle(image, (x, y), (x + w, y + h), (0, 255,0), 2)
            count3 += 1
            nameC = "Controller " + str(count3)
            cv2.putText(image, nameC, (x, y - 5),
            cv2.FONT_HERSHEY_COMPLEX_SMALL, 1, (0, 255,0), 2)
    cv2.imshow("Result", image)

    # show the frame
    #cv2.imshow("Frame", image)

    numofpin = len(square)
    numofRPi = len(square2)
    numofCon = len(square3)
    #itemupdate = "can" + str(numofcans)
    f = open("inventory.txt", "w")
    itemupdate = name1 +str(numofpin)+'\n' +name2+str(numofRPi) +'\n'+ name3+str(numofCon)
    f.write(itemupdate)
    f.close()
    print(itemupdate)
    # print(len(square))
    time.sleep(1)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break
#    key = cv2.waitKey(1) & 0xFF
    # clear the stream in preparation for the next frame
    rawCapture.truncate(0)
    # if the `q` key was pressed, break from the loop
    
