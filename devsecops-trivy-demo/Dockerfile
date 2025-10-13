FROM python:3.12-slim

ENV PYTHONDONTWRITEBYTECODE=1             PYTHONUNBUFFERED=1

# User non-root
RUN adduser --disabled-password --gecos "" appuser
WORKDIR /app

COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

COPY . .
USER appuser

EXPOSE 8000
CMD ["gunicorn", "-b", "0.0.0.0:8000", "app:app"]
