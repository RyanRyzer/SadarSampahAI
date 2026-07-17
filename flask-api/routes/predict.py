import os
import uuid
import traceback

from flask import Blueprint
from flask import jsonify
from flask import request

from services.predictor import predictor


predict_bp = Blueprint(
    "predict",
    __name__
)


ALLOWED_EXTENSIONS = {
    "jpg",
    "jpeg",
    "png"
}


UPLOAD_FOLDER = "uploads"


def allowed_file(filename):

    return (
        "." in filename
        and filename.rsplit(".", 1)[1].lower() in ALLOWED_EXTENSIONS
    )


@predict_bp.route(
    "/predict",
    methods=["POST"]
)
def predict():

    print("=" * 60, flush=True)
    print("POST /predict MASUK", flush=True)
    print("=" * 60, flush=True)

    try:

        print("Step 1 : Cek request.files", flush=True)

        print("Request Files :", request.files, flush=True)

        if "image" not in request.files:

            print("Tidak ada field image", flush=True)

            return jsonify({

                "success": False,

                "message": "Image file is required."

            }), 400

        image = request.files["image"]

        print("Step 2 : File diterima", flush=True)
        print("Filename :", image.filename, flush=True)

        if image.filename == "":

            return jsonify({

                "success": False,

                "message": "No image selected."

            }), 400

        if not allowed_file(image.filename):

            return jsonify({

                "success": False,

                "message": "Only JPG, JPEG and PNG are allowed."

            }), 400

        extension = image.filename.rsplit(".", 1)[1].lower()

        filename = f"{uuid.uuid4()}.{extension}"

        os.makedirs(
            UPLOAD_FOLDER,
            exist_ok=True
        )

        image_path = os.path.join(
            UPLOAD_FOLDER,
            filename
        )

        print("Step 3 : Simpan gambar", flush=True)

        image.save(image_path)

        print("Berhasil disimpan :", image_path, flush=True)

        print("Step 4 : Mulai AI Predict", flush=True)

        result = predictor.predict(
            image_path
        )

        print("Step 5 : AI selesai", flush=True)

        if os.path.exists(image_path):

            os.remove(image_path)

        print("Step 6 : Return JSON", flush=True)

        return jsonify(result)

    except Exception:

        traceback.print_exc()

        if "image_path" in locals():

            if os.path.exists(image_path):

                os.remove(image_path)

        return jsonify({

            "success": False,

            "message": "Internal Server Error"

        }), 500