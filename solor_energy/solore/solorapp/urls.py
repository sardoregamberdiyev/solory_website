from django.urls import path
from .views import *


urlpatterns = [
    path("", index, name='home'),
    path("about", about, name='about'),
    path("adventure", adventure, name='adventure'),
    path("contacts", contacts, name='contacts'),
    path("faq", faq, name='faq'),
    path("hotels_grid_isotope", hotels_grid_isotope, name='hotels_grid_isotope'),
    path("media_gallery", media_gallery, name='media_gallery'),
    path("restaurants_list_isotope", restaurants_list_isotope, name='restaurants_list_isotope'),
    path("tour_detail", tour_detail, name='tour_detail'),
    path("tours_list_isotope", tours_list_isotope, name='tours_list_isotope'),
]


