from flask import Flask, render_template
from perceptron_agro import resultado

app = Flask(__name__)


@app.route("/")
def index():
    res = resultado
    return render_template("index.html", valor=res)


if __name__ == "__main__":
    app.run(debug=False)
