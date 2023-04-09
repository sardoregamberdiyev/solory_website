from django.db import models

# Create your models here.
from django.utils.text import slugify

from solorapp import price_choise


class Category(models.Model):
    content = models.CharField(max_length=128)
    slug = models.SlugField(max_length=128, blank=True, null=True)

    def __str__(self):
        return self.content

    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.content)
        super(Category, self).save(*args, **kwargs)


class Tours(models.Model):
    name = models.CharField(max_length=256)
    price = models.IntegerField()
    price_type = models.CharField(max_length=5, choices=price_choise())
    short_description = models.TextField()
    date = models.DateTimeField(auto_now_add=True)
    image = models.ImageField()
    rate = models.IntegerField(max_length=9)
    ctg = models.ForeignKey(Category, on_delete=models.CASCADE)

    def __str__(self):
        return self.name


class Suggestion(models.Model):
    name = models.CharField(max_length=256)
    last_name = models.CharField(max_length=256)
    email = models.EmailField()
    subject = models.CharField(max_length=512)
    message = models.TextField()
    phone = models.CharField(max_length=128)

    def __str__(self):
        return self.name
