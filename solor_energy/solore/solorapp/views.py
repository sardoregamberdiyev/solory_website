from django.shortcuts import render
from .models import Tours, Category, Suggestion

# Create your views here.
from .services import get_recipes_all, get_recipes_one


def about(requests, slug=None):
    return render(requests, 'site/about.html', {})


def adventure(requests, slug=None):
    return render(requests, 'site/adventure.html', {})


def contacts(requests, slug=None):
    suggest = Suggestion()
    if requests.POST:
        suggest.name = requests.POST.get('name')
        suggest.email = requests.POST.get('email')
        suggest.subject = requests.POST.get('subject')
        suggest.message = requests.POST.get('message')
        suggest.save()

    return render(requests, 'site/contacts.html', {})


def faq(requests, slug=None):
    return render(requests, 'site/faq.html', {})


def hotels_grid_isotope(requests, slug=None):
    return render(requests, 'site/hotels-grid-isotope.html', {})


def index(requests, slug=None):
    recipes = Tours.objects.all()
    ctgs = Category.objects.all()

    if slug:
        ctg = Category.objects.get(slug=slug)
        tours = Tours.objects.all().filter(ctg=ctg)
    else:
        tours = Tours.objects.all()

    ctx = {
        "recipes": recipes,
        "ctgs": ctgs,
        "tours": tours,
    }

    return render(requests, 'site/index.html', ctx)


def media_gallery(requests, slug=None):
    return render(requests, 'site/media-gallery.html', {})


def restaurants_list_isotope(requests, slug=None):
    return render(requests, 'site/restaurants-list-isotope.html', {})


def tour_detail(requests, slug=None):
    return render(requests, 'site/tour-detail.html', {})


def tours_list_isotope(requests, slug=None):
    return render(requests, 'site/tours-list-isotope.html', {})
