import os

from dotenv import load_dotenv

from flask import Flask
from flask_cors import CORS

from routes.predict import predict_bp


load_dotenv()


app = Flask(__name__)

CORS(app)


UPLOAD_FOLDER = os.getenv(
    "UPLOAD_FOLDER",
    "uploads"
)

app.config["UPLOAD_FOLDER"] = UPLOAD_FOLDER

os.makedirs(
    UPLOAD_FOLDER,
    exist_ok=True
)


@app.route("/")
def index():

    return {

        "success": True,

        "message": "Sadar Sampah AI API",

        "version": "1.0.0"

    }
@app.route("/ping")
def ping():

    return {
        "success": True,
        "message": "Ping OK"
    }


app.register_blueprint(
    predict_bp
)


if __name__ == "__main__":

    app.run(

        host="0.0.0.0",

        port=5000,

        debug=True

    )