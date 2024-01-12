from gtts import gTTS
import logging

logging.basicConfig(format='%(asctime)s,%(msecs)d %(name)s %(levelname)s %(message)s',
                    datefmt='%H:%M:%S',
                    level=logging.DEBUG)

text = 'asdasddasdas'
speech = gTTS(text=text, lang='ru', slow=True)
speech.save("name_status.mp3")