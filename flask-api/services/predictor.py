import os
import time
import traceback
import numpy as np
import tensorflow as tf

from services.image_processor import preprocess_image


class WastePredictor:

    def __init__(self):

        base_dir = os.path.dirname(
            os.path.dirname(
                os.path.abspath(__file__)
            )
        )

        model_path = os.getenv(
            "MODEL_PATH",
            os.path.join(base_dir, "model.tflite")
        )

        labels_path = os.path.join(
            base_dir,
            "labels.txt"
        )

        self.interpreter = tf.lite.Interpreter(
            model_path=model_path
        )

        self.interpreter.allocate_tensors()

        self.input_details = self.interpreter.get_input_details()

        self.output_details = self.interpreter.get_output_details()

        with open(
            labels_path,
            "r",
            encoding="utf-8"
        ) as f:

            self.labels = [
                line.strip()
                for line in f.readlines()
            ]

        print("=" * 60)
        print("TensorFlow Lite Model Loaded Successfully")
        print("=" * 60)
        print("Model Path :", model_path)
        print("Input Shape :", self.input_details[0]["shape"])
        print("Output Shape :", self.output_details[0]["shape"])
        print("Total Labels :", len(self.labels))
        print("=" * 60)

    def predict(self, image_path):

        start_time = time.time()

        try:

            print("[1] Preprocessing Image...")

            image = preprocess_image(image_path)

            print("[2] Image Shape :", image.shape)

            print("[3] Set Tensor...")

            self.interpreter.set_tensor(
                self.input_details[0]["index"],
                image
            )

            print("[4] Invoke Model...")

            self.interpreter.invoke()

            print("[5] Get Output...")

            output = self.interpreter.get_tensor(
                self.output_details[0]["index"]
            )

            print("[6] Raw Output :", output)

            output = output[0]

            predicted_index = int(
                np.argmax(output)
            )

            predicted_label = self.labels[
                predicted_index
            ]

            confidence = float(
                output[predicted_index]
            )

            top_indices = np.argsort(
                output
            )[::-1][:3]

            top_predictions = []

            for index in top_indices:

                top_predictions.append({

                    "label": self.labels[index],

                    "confidence": round(
                        float(output[index]) * 100,
                        2
                    )

                })

            processing_time = round(
                time.time() - start_time,
                3
            )

            print("[7] Prediction Success")
            print("Category :", predicted_label)
            print("Confidence :", confidence)

            return {

                "success": True,

                "category": predicted_label,

                "confidence": round(
                    confidence * 100,
                    2
                ),

                "top_predictions": top_predictions,

                "processing_time": processing_time

            }

        except Exception as e:

            print("=" * 60)
            print("ERROR SAAT PREDICT")
            print("=" * 60)

            traceback.print_exc()

            return {

                "success": False,

                "message": str(e)

            }


predictor = WastePredictor()