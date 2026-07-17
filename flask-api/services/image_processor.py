from PIL import Image
import numpy as np


IMAGE_SIZE = (224, 224)


def preprocess_image(image_path):
    image = Image.open(image_path).convert("RGB")
    image = image.resize(IMAGE_SIZE)

    image_array = np.array(image).astype(np.float32)

    image_array /= 255.0

    image_array = np.expand_dims(image_array, axis=0)

    return image_array