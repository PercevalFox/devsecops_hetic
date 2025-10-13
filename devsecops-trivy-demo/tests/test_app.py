from app import app

def test_root():
    client = app.test_client()
    rv = client.get("/")
    assert rv.status_code == 200
    assert rv.get_json() == {"msg": "Hello, DevSecOps!"}
