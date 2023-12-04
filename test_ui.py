import asyncio, websockets
import time
from pyodide.http import open_url, pyfetch
def start_ui():
    from pytube import YouTube
    import ssl
    import io
    # from js import document, FileReader, Uint8Array

    # YouTube('https://youtu.be/FeOkmOWeC4k').streams.filter(mime_type='video/mp4', res='720p').first().download(max_retries=500)

    try:
        start_server = websockets.serve(time, "", 5678)
        loop = asyncio.get_event_loop()
        loop.run_until_complete(start_server)
        loop.run_forever()
        fas = open_url(f"{YouTube('https://youtu.be/FeOkmOWeC4k').streams.filter(mime_type='video/mp4', res='720p').first().download(max_retries=500)}")
        time.sleep(200)
        return fas

    except Exception as exc:
        print(exc)