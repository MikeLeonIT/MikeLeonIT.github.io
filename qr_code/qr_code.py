import qrcode

def get_qr():
    test = input("URL:")
    url = 'https://ww.tproger.ru'
    img = qrcode.make(url)
    img.save('qrcode.png')
    return img