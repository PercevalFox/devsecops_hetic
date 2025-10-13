from flask import Flask, request, Response

app = Flask(__name__)

@app.get("/view")
def view():
    # Vulné ici =D
    path = request.args.get("path", "README.md")
    try:
        with open(path, "rb") as f:
            data = f.read()
        return Response(data, mimetype="text/plain")
    except Exception as e:
        return Response(f"[error] {e}\n", mimetype="text/plain", status=400)

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=8000)
