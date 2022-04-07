# import the necessary packages
from picamera.array import PiRGBArray
from picamera import PiCamera
import time
import cv2


#initialize path and color
cansCas = cv2.CascadeClassifier("RPiCascadeNew.xml") #cans_cascade
minArea = 100
color = (255,0,255)
count = 0
itemupdate = ""

# initialize the camera and grab a reference to the raw camera capture
camera = PiCamera()
camera.resolution = (352,240)
camera.framerate = 24
rawCapture = PiRGBArray(camera, size=(352,240))


# allow the camera to warmup
time.sleep(0.1)
cv2.startWindowThread()
# capture frames from the camera
for frame in camera.capture_continuous(rawCapture, format="bgr", use_video_port=True):
    # grab the raw NumPy array representing the image, then initialize the timestamp
    # and occupied/unoccupied text
    image = frame.array
    imgGray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    square = cansCas.detectMultiScale(imgGray, 1.1, 1)
    for (x, y, w, h) in square:
        area = w * h
        if area > minArea:
            cv2.rectangle(image, (x, y), (x + w, y + h), (255, 0, 255), 2)
            cv2.putText(image, "can", (x, y - 5),
                        cv2.FONT_HERSHEY_COMPLEX_SMALL, 1, color, 2)
            # imgRoi = img[y:y + h, x:x + w]
            # cv2.imshow("ROI", imgRoi)
    # show the frame
    cv2.imshow("Frame", image)

    #numofcans = len(square)
    #itemupdate = "can" + str(numofcans)
    #f = open("inventory.txt", "w")
    #f.write(itemupdate)
    #f.close()
    #print(itemupdate)
    # print(len(square))
    #time.sleep(1)

    key = cv2.waitKey(1) & 0xFF
    # clear the stream in preparation for the next frame
    rawCapture.truncate(0)
    # if the `q` key was pressed, break from the loop
    if key == ord("q"):
        break