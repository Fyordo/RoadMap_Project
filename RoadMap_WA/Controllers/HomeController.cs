using Microsoft.AspNetCore.Mvc;
using RoadMap_WA.Data.Intefaces;
using RoadMap_WA.ViewModels;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Controllers
{
    public class HomeController : Controller
    {
        private readonly IAllRoadMaps _allRoadMaps;
        private readonly IRMCategory _allRMCategories;

        public HomeController(IAllRoadMaps _allRoadMaps, IRMCategory _allRMCategories)
        {
            this._allRoadMaps = _allRoadMaps;
            this._allRMCategories = _allRMCategories;
        }

        /// <summary>
        /// Send popular RoadMaps to the Page
        /// </summary>
        /// <returns></returns>
        public ViewResult Index()
        {
            ViewBag.Title = "Home Page";
            HomeViewModel obj = new HomeViewModel();
            obj.AllRoadMaps = _allRoadMaps.RoadMaps.Where(rm => rm.IsPopular);
            obj.RoadMapCategory = "Категория";
            return View(obj);
        }
    }
}
