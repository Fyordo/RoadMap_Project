using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Models
{
    public class RoadMapNode
    {
        // Всякая дичь для базы данных
        /// <summary>
        /// Код Node в данной карте
        /// </summary>
        public int _Id { get; set; }
        /// <summary>
        /// ID Родительского Node
        /// </summary>
        public int _ParentID { get; set; }
        /// <summary>
        /// Тип Node-a (начало, посредник, конец)
        /// </summary>
        public string _Type { get; set; }

        // Реализация класса

        /// <summary>
        /// Название Node-a
        /// </summary>
        public string Title { get; set; }
        /// <summary>
        /// Длинное описание Node-a
        /// </summary>
        public string LongDesc { get; set; }

        public RoadMapNode(int id, int parentID, string type, string title, string longDesc)
        {
            _Id = id;
            _ParentID = parentID;
            _Type = type;
            Title = title;
            LongDesc = longDesc;
        }
    }
}
