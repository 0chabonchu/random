import random
import string
import requests
import base64

# Mengatur informasi autentikasi GitHub
username = "0chabonchu"
access_token = "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"

# Mengatur informasi repositori
repo_owner = "0chabonchu"
repo_name = "coba"
file_path = "0chabonchu/random/coba"

# Membuat daftar nama dan angka acak
random_data = []
for _ in range(10):
    random_string = ''.join(random.choices(string.ascii_letters + string.digits, k=8))
    random_data.append(random_string)

# Menyimpan daftar nama dan angka ke dalam file teks
with open(file_path, "w") as file:
    file.write("\n".join(random_data))

# Mengonversi konten file ke dalam format Base64
file_content = open(file_path, "rb").read()
file_content_encoded = base64.b64encode(file_content).decode()

# Mengatur endpoint API GitHub
url = f"https://api.github.com/repos/{0chabonchu}/{random}/contents/{0chabonchu/random/coba}"

# Menyiapkan header dan payload untuk request API
headers = {
    "Authorization": f"Bearer {access_token}",
    "Accept": "application/vnd.github.v3+json"
}
payload = {
    "message": "Update file",
    "content": file_content_encoded
}

# Melakukan request API untuk membuat atau mengupdate file
response = requests.put(url, headers=headers, json=payload)

# Mengecek status response
if response.status_code == 200:
    print("File berhasil dibuat atau diupdate di repositori GitHub.")
else:
    print("Terjadi kesalahan dalam membuat atau mengupdate file di repositori GitHub.")
    print(f"Status code: {response.status_code}, Pesan: {response.json().get('message')}")
