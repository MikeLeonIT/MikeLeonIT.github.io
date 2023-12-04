import asyncio
import time
async def start_ui():
    from pytube import YouTube
    import ssl
    import io
    # from js import document, FileReader, Uint8Array

    # YouTube('https://youtu.be/FeOkmOWeC4k').streams.filter(mime_type='video/mp4', res='720p').first().download(max_retries=500)

    try:
        f = await YouTube('https://youtu.be/FeOkmOWeC4k').streams.filter(mime_type='video/mp4', res='720p').first().download(max_retries=500)
        time.sleep(200)
        await f

    except Exception as exc:
        print(exc)