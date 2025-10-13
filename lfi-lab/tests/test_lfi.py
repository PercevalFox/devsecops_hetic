import os
import sys
import pathlib

# Rendre l'appli importable
HERE = pathlib.Path(__file__).resolve().parents[1]
sys.path.insert(0, str(HERE))
from app import app  # noqa

def test_lfi_hosts_file_disclosure():
    c = app.test_client()
    # On tente de lire le fichier hosts du runner Linux
    r = c.get("/view?path=../../etc/hosts")
    body = r.get_data(as_text=True)
    assert r.status_code == 200
    # Heuristique: la plupart des /etc/hosts contiennent "localhost"
    assert "localhost" in body.lower()
