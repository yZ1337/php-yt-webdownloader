#!/usr/bin/env python
from pytube import YouTube
import argparse

def generateVideo(link, id):
    yt = YouTube(link)
    ys = yt.streams.get_highest_resolution()
    # if filter.filesize < 1950000000:
    ys.download(filename=id + ".mp4")

def main():
    parser = argparse.ArgumentParser(description = "Simple Python script to download YouTube Video's")
    parser.add_argument("-l", "--link", help = "the video")
    parser.add_argument("-i", "--id", help="the id")
    args = parser.parse_args()

    if args.link == None:
        print("Provide a video")
    else:
        link = args.link

    if args.id == None:
        print("Provide a video")
    else:
        id = args.id

    generateVideo(link, id)


if __name__ == "__main__":
    main()