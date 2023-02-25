#!/usr/bin/env python

# This file is made by: oVeXz
# Github: https://github.com/oVeXz 
# Feel free to use this, but please promote it when using it for your own projects!

# Import pytube.
from pytube import YouTube

# Import Argparse.
import argparse

# Function for generating the .mp4 of a YouTube Video, with a link and a Id.
def generateVideo(link, id):
    # Get YouTube video by link
    yt = YouTube(link)
    # Get the highest resolution of the YouTube video.
    ys = yt.streams.get_highest_resolution()
    # Download the YouTube video as .mp4 format, with file name as give Id and in the /downloads folder.
    ys.download('../downloads', filename=id + ".mp4")

# Main function of this script.
def main():
    # Parser description.
    parser = argparse.ArgumentParser(description = "Simple Python script to download YouTube Video's")
    # Parser argument for the link.
    parser.add_argument("-l", "--link", help = "the video")
    # Parser argument for the Id.
    parser.add_argument("-i", "--id", help="the id")
    # Add everything together.
    args = parser.parse_args()

    # Adds the link argument with value.
    if args.link == None:
        print("Provide a video")
    else:
        link = args.link

    # Adds the link argument with value.
    if args.id == None:
        print("Provide a video")
    else:
        id = args.id

    # Run generateVideo() function.
    generateVideo(link, id)


if __name__ == "__main__":
    main()