import os
import sys
import pathlib

HERE = pathlib.Path(__file__).resolve().parents[1]
sys.path.insert(0, str(HERE))
from app import app  # noqa

def test_lfi_hosts_file_disclosure():
    c = app.test_client()
    r = c.get("/view?path=/etc/hosts")
    body = r.get_data(as_text=True)
    assert r.status_code == 200
    assert "localhost" in body.lower()
