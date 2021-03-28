# ML-InventoryControl
ML-based inventory control system with object recognition using image processing.
An embedded system equipped with a camera is used to capture and recognize objects to feed into an inventory database in the cloud.


This project develops an ML-based inventory control system with object recognition using image processing. 
An embedded system equipped with a camera is used to capture and recognize objects to feed into an inventory database in the cloud. 
Users access the front-end website of the inventory system for related functions such as the state of inventory and ordering. 
Notifications are issued if an object goes missing without proper processing.

The embedded system is based on Raspberry Pi 4 Model B with 4GB RAM and a camera to aid in image capture and compute-intensive
task of image processing.  Python and related image processing libraries and packages, such as OpenCV/Cascade Classifier are used. 
The system's website provides secured access to users to access the inventory system.  The public facing webpage provides general 
information about the system and an opportunity to login.  Amazon Web Services (AWS) are used as the hosting platform.  T
he website houses the inventory DB which also keeps users and system logs.
