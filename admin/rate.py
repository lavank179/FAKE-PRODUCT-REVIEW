from textblob import TextBlob
reviews = ""

with open("C:/xampp/htdocs/DP/admin/userReview.txt") as f:
	reviews = f.read().replace('\n', '')
reviews1 = TextBlob(reviews)

polairty1 = []
polairty1.append((reviews1.sentiment.polarity))
polairty1.append((reviews1.sentiment.subjectivity))

print(polairty1)
