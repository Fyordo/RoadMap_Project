using Microsoft.AspNetCore.Mvc;
using RoadMap_WA.Data.Intefaces;
using RoadMap_WA.ViewModels;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Controllers
{
    public class RoadMapsController : Controller
    {
        private readonly IAllRoadMaps _allRoadMaps;
        private readonly IRMCategory _allRMCategories;

        public RoadMapsController(IAllRoadMaps _allRoadMaps, IRMCategory _allRMCategories)
        {
            this._allRoadMaps = _allRoadMaps;
            this._allRMCategories = _allRMCategories;
        }

        /// <summary>
        /// Передача всех RoadMap-ов на HTML страницу
        /// </summary>
        /// <returns></returns>
        public ViewResult List()
        {
            ViewBag.Title = "RoadMaps List";
            RoadMapsListViewModel obj = new RoadMapsListViewModel();
            obj.AllRoadMaps = _allRoadMaps.RoadMaps;
            obj.RoadMapCategory = "Категория";
            return View(obj);
        }
    }
}
